import { Component, Input, Output } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { DataService } from 'src/app/services/data.service';
import { Genealogy } from '../genealogy/genealogy.component';

const jsonFromApi = {"header":{"id":null,"versionNumber":"5.5.5","versionForm":"LINEAGE-LINKED","charactereSet":"UTF-8","receivingSystemName":"All users","sourceVersionNumber":"5.5.5","sourceName":"GEDCOM Specification","sourceBusiness":"Yannick Brocart","sourceNameData":"www.yannickbrocart.com data","sourceNameDataDate":"2023-12-05T17:58:41+01:00","sourceNameDataCopyright":"\u00a9 2023 Yannick Brocart","fileCreationDate":"1971-12-05T09:20:17+01:00","language":"English","fileName":"Gedcom555Sample.ged","copyright":"\u00a9 2023 Yannick Brocart","note":"The GEDCOM 5.5.5 Specification Sample GEDCOM File (UTF-8)."},"individuals":[{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"BROCART","nickname":null,"surnamePrefix":null,"surname":"Yannick","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1971-08-15T04:00:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null},"deathDetail":null},"childToFamily":{"id":1},"spouseToFamily1":[],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"BROCART","nickname":null,"surnamePrefix":null,"surname":"Pierre-Alain","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1945-05-20T21:30:00+02:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null},"deathDetail":null},"childToFamily":{"id":2},"spouseToFamily1":[{"id":1}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"LIEUDENOT","nickname":null,"surnamePrefix":null,"surname":"Jacqueline","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1947-10-04T04:30:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null},"deathDetail":null},"childToFamily":{"id":3},"spouseToFamily1":[],"spouseToFamily2":[{"id":1}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"BROCART","nickname":null,"surnamePrefix":null,"surname":"Marius","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1920-10-07T22:00:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Nice,06000,Alpes-Maritimes,Provence-Alpes-C\u00f4te D'Azur,FRANCE","latitude":"N43.710173","longitude":"E7.261953"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1998-03-15T02:45:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"D\u00e9sertines,03630,Allier,Auvergne,FRANCE","latitude":"N46.354836","longitude":"E2.618205"}},"ageAtEvent":null}},"childToFamily":{"id":4},"spouseToFamily1":[{"id":2}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"CELLI\u00c8RE","nickname":null,"surnamePrefix":null,"surname":"Odette","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1919-10-19T14:00:00+00:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"2018-10-03T10:15:00+02:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null}},"childToFamily":{"id":5},"spouseToFamily1":[],"spouseToFamily2":[{"id":2}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"LIEUDENOT","nickname":null,"surnamePrefix":null,"surname":"Ren\u00e9","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1920-09-15T06:00:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Paray-Le-Monial,71600,Sa\u00f4ne-Et-Loire,Bourgogne,FRANCE","latitude":"N46.452222","longitude":"E4.120665"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"2004-08-22T01:00:00+02:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"D\u00e9sertines,03630,Allier,Auvergne,FRANCE","latitude":"N46.354836","longitude":"E2.618205"}},"ageAtEvent":null}},"childToFamily":{"id":6},"spouseToFamily1":[{"id":3}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"BRAVY","nickname":null,"surnamePrefix":null,"surname":"Marie Yvonne","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1920-03-15T03:00:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Saint-Amand-Montrond,18200,Cher,Centre,FRANCE","latitude":"N46.725486","longitude":"E2.505604"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"2006-03-01T06:30:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"D\u00e9sertines,03630,Allier,Auvergne,FRANCE","latitude":"N46.354836","longitude":"E2.618205"}},"ageAtEvent":null}},"childToFamily":{"id":7},"spouseToFamily1":[],"spouseToFamily2":[{"id":3}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"BROCART","nickname":null,"surnamePrefix":null,"surname":"Antoine","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1876-11-30T03:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Grasse,06130,Alpes-Maritimes,Provence-Alpes-C\u00f4te D'Azur,FRANCE","latitude":"N43.6589011","longitude":"E6.9239103"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1951-03-29T00:15:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Nice,06000,Alpes-Maritimes,Provence-Alpes-C\u00f4te D'Azur,FRANCE","latitude":"N43.710173","longitude":"E7.261953"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[{"id":4}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"MERELLO","nickname":null,"surnamePrefix":null,"surname":"Rose Francine","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1899-05-10T14:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Nice,06000,Alpes-Maritimes,Provence-Alpes-C\u00f4te D'Azur,FRANCE","latitude":"N43.710173","longitude":"E7.261953"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1958-08-31T03:15:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Nice,06000,Alpes-Maritimes,Provence-Alpes-C\u00f4te D'Azur,FRANCE","latitude":"N43.710173","longitude":"E7.261953"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[],"spouseToFamily2":[{"id":4}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"CELLI\u00c8RE","nickname":null,"surnamePrefix":null,"surname":"Louis \u00c9mile","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1885-05-01T19:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Chavenon,03440,Allier,Auvergne,FRANCE","latitude":"N46.4142129","longitude":"E2.945924"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1971-03-31T06:00:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[{"id":5}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"MONTPIED","nickname":null,"surnamePrefix":null,"surname":"L\u00e9ontine Marie","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1891-07-18T08:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Vieure,03430,Allier,Auvergne,FRANCE","latitude":"N46.5014402","longitude":"E2.8755012"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1984-12-17T05:30:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"N\u00e9ris-les-Bains,03310,Allier,Auvergne,FRANCE","latitude":"N46.2898064","longitude":"E2.6583028"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[],"spouseToFamily2":[{"id":5}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"LIEUDENOT","nickname":null,"surnamePrefix":null,"surname":"Fran\u00e7ois","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1892-05-30T12:15:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Charolles,71120,Cher,Centre,FRANCE","latitude":"N46.4353138","longitude":"E4.2730502"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1958-09-07T01:30:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Digoin,71160,Sa\u00f4ne-Et-Loire,Bourgogne,FRANCE","latitude":"N46.4810422","longitude":"E3.9786291"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[{"id":6}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"PLUCHERY","nickname":null,"surnamePrefix":null,"surname":"Catherine Louise","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1889-12-28T20:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Saint-Agnan,71160,Sa\u00f4ne-Et-Loire,Bourgogne,FRANCE","latitude":"N46.5033195","longitude":"E3.8795319"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1978-09-21T17:15:00+02:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Paray-Le-Monial,71600,Sa\u00f4ne-Et-Loire,Bourgogne,FRANCE","latitude":"N46.450559","longitude":"E4.1177959"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[],"spouseToFamily2":[{"id":6}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"DUPUIS","nickname":null,"surnamePrefix":null,"surname":"\u00c9mile","suffix":null}]}],"sex":"Male","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1899-05-16T17:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Arcomps,18200,Cher,Centre,FRANCE","latitude":"N46.6756551","longitude":"E2.4321361"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1995-07-26T11:00:00+02:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Saint-Amand-Montrond,18200,Cher,Centre,FRANCE","latitude":"N46.7227062","longitude":"E2.5046503"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[{"id":7}],"spouseToFamily2":[]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"DELAPIERRE","nickname":null,"surnamePrefix":null,"surname":"Henriette","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1897-07-17T20:00:00+00:09","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"14e arrondissement,75014,Paris,\u00cele-De-France,FRANCE","latitude":"N48.8295667","longitude":"E2.3239625"}},"ageAtEvent":null},"deathDetail":{"eventDetail":{"type":null,"date":"1992-11-18T11:00:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null}},"childToFamily":null,"spouseToFamily1":[],"spouseToFamily2":[{"id":7}]},{"names":[{"type":"Birth","namePieces":[{"prefix":null,"given":"LIEUDENOT","nickname":null,"surnamePrefix":null,"surname":"Mich\u00e8le","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1948-11-22T04:30:00+01:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null},"deathDetail":null},"childToFamily":{"id":3},"spouseToFamily1":[],"spouseToFamily2":[]},{"names":[{"type":"User defined","namePieces":[{"prefix":null,"given":"NURET","nickname":null,"surnamePrefix":null,"surname":"Dani\u00e8le Nicole","suffix":null}]}],"sex":"Female","individualEvents":{"birthDetail":{"eventDetail":{"type":null,"date":"1941-10-07T04:30:00+02:00","responsibleAgency":null,"religiousAffiliation":null,"cause":null,"place":{"name":"Montlu\u00e7on,03100,Allier,Auvergne,FRANCE","latitude":"N46.3415466","longitude":"E2.6019912"}},"ageAtEvent":null},"deathDetail":null},"childToFamily":{"id":3},"spouseToFamily1":[],"spouseToFamily2":[]}],"families":[{"id":1},{"id":2},{"id":3},{"id":4},{"id":5},{"id":6},{"id":7}]};


@Component({
  selector: 'app-genealogy-manage',
  templateUrl: './genealogy-manage.component.html',
  styleUrls: ['./genealogy-manage.component.css']
})
export class GenealogyManageComponent{
  @Input() genealogy: Genealogy  | undefined;
  public isRenameGenealogy: boolean = false;
  public isDeleteGenealogy: boolean = false;
  public idGenealogy: number = 0;
  public genealogies: Genealogy[] = [];

  renameGenealogyForm = this.formBuilder.group({
    newName: ['', [
      Validators.required, 
      Validators.minLength(6),
      Validators.maxLength(80)]]
  });

  deleteGenealogyForm = this.formBuilder.group({});

  constructor(private dataService: DataService, private router: Router, private formBuilder: FormBuilder) {
    this.getGenealogies(); 
  }

  sendIsManageGenealogies(data: boolean) {
    this.dataService.sendIsManageGenealogies(data);
  }

  sendGenealogyOpened(data: any) { 
    this.dataService.sendGenealogyOpened(data); 
  }


  public getGenealogies() {
    this.dataService.getGenealogies().subscribe((data: any) => {
      Object.entries(data).forEach((value: any, key: number) => {
        this.genealogies = data;
      })
    });
  }


  public openGenealogyById(id: number) {
    this.dataService.openGenealogyById(id).subscribe((response:any) => {
       this.sendGenealogyOpened(jsonFromApi);
       this.sendIsManageGenealogies(false);
      });   
      
  }


  public renameGenealogy(id: number) {
    this.isDeleteGenealogy = false;
    this.isRenameGenealogy = true;
    this.renameGenealogyForm.reset();
    this.idGenealogy = id;
  }
  

  public onSubmitRenameGenealogyForm() {
    this.dataService.renameGenealogy(this.idGenealogy, this.renameGenealogyForm.value.newName as string)
      .subscribe((response: any) => { this.router.navigate(['/genealogy'])
    });
    this.isRenameGenealogy = false;
    this.getGenealogies();
  }


  public deleteGenealogy(id: number) {
    this.isRenameGenealogy = false;
    this.isDeleteGenealogy = true;
    this.idGenealogy = id;
    } 


  public onSubmitDeleteGenealogyForm() {
    this.dataService.deleteGenealogy(this.idGenealogy)
      .subscribe((response: any) => { this.router.navigate(['/genealogy'])
    });
    this.isDeleteGenealogy = false;
    this.getGenealogies();
  }

}
