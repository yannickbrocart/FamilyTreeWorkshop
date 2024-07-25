import { Injectable } from '@angular/core';
import { Individual, Generation, Family, Place } from '../modules/application/genealogy-lists/genealogy-lists.component';

var jsonFromApi: any = '';
var listByIndividual: Individual[] = [];
var listByFamily: Family[] = [];
var listOfChilds: Individual[] = [];
var listByPlace: Place[] = [];
var family: Family;
var place: Place;
var firstName: string = '';
var lastName: string = '';
var sex: string = '';
var birthDate: string = '';
var deathDate: string = '';
var husband: string;
var wife: string;

@Injectable({
  providedIn: 'root',
})
export class ParseService {
  constructor() {}

  parseJsonToListByIndividual(json: any) {
    jsonFromApi = json;
    if (jsonFromApi['individuals']) {
      for (var i = 0; i < jsonFromApi['individuals'].length; i++) {
        listByIndividual.push(this.getIndividuals(i));
      }
    }
    return listByIndividual;
  }

  parseJsonToListByFamily(jsonFromApi: any) {
    var child: Individual = {};
    if (jsonFromApi['families']) {
      for (var i = 1; i <= jsonFromApi['families'].length; i++) {
        listOfChilds = [];
        if (jsonFromApi['individuals']) {
          for (var j = 0; j < jsonFromApi['individuals'].length; j++) {
            if (jsonFromApi['individuals'][j]['spouseToFamily1'][0]) {
              if (jsonFromApi['individuals'][j]['spouseToFamily1'][0]['id'] == i.toString()) {
                husband =  jsonFromApi['individuals'][j]['names'][0]['namePieces'][0]['surname'] 
                + ' ' + jsonFromApi['individuals'][j]['names'][0]['namePieces'][0]['given'];
              } 
            }
            if (jsonFromApi['individuals'][j]['spouseToFamily2'][0]) {
              if (jsonFromApi['individuals'][j]['spouseToFamily2'][0]['id'] == i.toString()) {
                wife =  jsonFromApi['individuals'][j]['names'][0]['namePieces'][0]['surname'] 
                + ' ' + jsonFromApi['individuals'][j]['names'][0]['namePieces'][0]['given'];
              }
            }
            if(jsonFromApi['individuals'][j]['childToFamily']){
              if(jsonFromApi['individuals'][j]['childToFamily']['id'] == i.toString()) {
                child = this.getIndividuals(j)
                listOfChilds.push(child);
              }
            }
          }          
        }
        family = {'id': i, 'husband': husband, 'wife': wife, 'childs': listOfChilds};
        listByFamily.push(family);
      }
    }
    return listByFamily;
  }

  parseJsonToListByPlace(json: any) {
    jsonFromApi = json;
    var name;
    var latitude;
    var longitude;
    if (jsonFromApi['individuals']) {
      for (var i = 0; i < jsonFromApi['individuals'].length; i++) {
        if (jsonFromApi['individuals'][i]['individualEvents'][0]['birthDetail']['eventDetail']['place']['name']) {
          name = jsonFromApi['individuals'][i]['individualEvents'][0]['birthDetail']['eventDetail']['place']['name']
          name = name.replace(/(,)/gi, ', ');
          latitude = jsonFromApi['individuals'][i]['individualEvents'][0]['birthDetail']['eventDetail']['place']['latitude']
          longitude = jsonFromApi['individuals'][i]['individualEvents'][0]['birthDetail']['eventDetail']['place']['longitude']
          place = {name: name, latitude: latitude, longitude: longitude};
          if (!listByPlace.find((element) => element.name === place.name)) listByPlace.push(place);
        }
        if (jsonFromApi['individuals'][i]['individualEvents']['death']) {
          name = jsonFromApi['individuals'][i]['individualEvents'][0]['deathDetail']['eventDetail']['place']['name']
          name = name.replace(/(,)/gi, ', ');
          latitude = jsonFromApi['individuals'][i]['individualEvents'][0]['deathDetail']['eventDetail']['place']['latitude']
          longitude = jsonFromApi['individuals'][i]['individualEvents'][0]['deathDetail']['eventDetail']['place']['longitude']
          place = {name: name, latitude: latitude, longitude: longitude};
          if (!listByPlace.find((element) => element.name === place.name)) listByPlace.push(place);
        }
      }
    } 
        
    return listByPlace.sort((a,b) => (a.name > b.name ? 1 : -1));
  }


  parseJsonToListByGeneration(json: any) {
    jsonFromApi = json;
    var rootId: number = 0;
    var generationId: number = 1;
    var generation: Generation = {};
    var listByGeneration: Generation[] = [];
    var individual: Individual = {};
    var listOfIndividuals: Individual[] = [];
    
    // if (jsonFromApi['individuals']) {
    //   for (var i = 0; i < jsonFromApi['individuals'].length; i++) {
    //     var isGenerationCompleted: boolean = false;
    //     individual = this.getIndividuals(i);

    //     if (i === rootId) {
    //       isGenerationCompleted = true;
    //     } else if (i === jsonFromApi['individuals'].length-1) {
    //       isGenerationCompleted = true;
    //     }
    //     listOfIndividuals.push(individual);
    //     if (isGenerationCompleted) {
    //       generation = {'generation': generationId,'individuals': listOfIndividuals.sort((a,b) => (a.lastName! > b.lastName! ? 1 : -1))};
    //       listByGeneration.push(generation);
    //       generationId ++;
    //       listOfIndividuals = [];
    //     }

    //   }
    // }
    return listByGeneration;
  }


  getIndividuals(i: number): Individual {
    var individual: Individual = {};

    if (jsonFromApi['individuals'][i]['names'][0]['namePieces']) {
      firstName = jsonFromApi['individuals'][i]['names'][0]['namePieces'][0]['surname'];
      lastName = jsonFromApi['individuals'][i]['names'][0]['namePieces'][0]['given'];
    } else { firstName = ''; lastName = ''; }
    if (jsonFromApi['individuals'][i]['sex']) {
      if (jsonFromApi['individuals'][i]['sex'] == 'Male') {
        sex = 'M';
      } else if (jsonFromApi['individuals'][i]['sex'] == 'Female') sex = 'F';
    } else sex = '';
    if (jsonFromApi['individuals'][i]['individualEvents'][0]['birthDetail']) {
      birthDate = jsonFromApi['individuals'][i]['individualEvents'][0]['birthDetail']['eventDetail']['date'].substr(0, 4);
    } else birthDate = '';
    if (jsonFromApi['individuals'][i]['individualEvents'][0]['deathDetail']) {
      deathDate = jsonFromApi['individuals'][i]['individualEvents'][0]['deathDetail']['eventDetail']['date'].substr(0, 4);
    } else deathDate = '';
    individual = { firstName: firstName, lastName: lastName, sex: sex, birthDate: birthDate, deathDate: deathDate };
    return individual;
  }
  
}
