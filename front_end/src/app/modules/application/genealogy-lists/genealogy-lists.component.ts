import { Component } from '@angular/core';
import { ParseService } from 'src/app/services/parse.service';
import { DataService } from 'src/app/services/data.service';


export type Individual = {
  firstName?: string;
  lastName?: string;
  sex?: string;
  birthDate?: string;
  deathDate?: string;
}

export type Generation = {
  generation?: number;
  individuals?: Individual[];
}

export type Family = {
  id: number;
  husband?: string;
  wife?: string;
  childs: Individual[];
}

export type Place = {
  name: string;
  latitude?: string;
  longitude?: string;
}

@Component({
  selector: 'app-genealogy-lists',
  templateUrl: './genealogy-lists.component.html',
  styleUrls: ['./genealogy-lists.component.css'],
})
export class GenealogyListsComponent {
  isIndividualList: boolean = true;
  isGenerationList: boolean = false;
  isFamilyList: boolean = false;
  isPlaceList: boolean = false;
  genealogyData: any = null;
  individuals: Individual[] = [];
  //generations: Generation[] = [];
  generations: Generation[] = [
    { generation: 1,  individuals: [{ firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'}] },
    { generation: 2,  individuals: [{ firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'},
                                    { firstName: 'Jacqueline', lastName: 'Lieudenot', sex: 'F', birthDate: '1947'}] },
    { generation: 3,  individuals: [{ firstName: 'Marius', lastName: 'Brocart', sex: 'M', birthDate: '1920', deathDate: '1998'},
                                    { firstName: 'Odette', lastName: 'Cellière', sex: 'F', birthDate: '1999', deathDate: '2018'},
                                    { firstName: 'René', lastName: 'Lieudenot', sex: 'M', birthDate: '1920', deathDate: '2004'},
                                    { firstName: 'Marie Yvonne', lastName: 'Bravy', sex: 'F', birthDate: '1920', deathDate: '2006'}] }
  ];

  families: Family[] = [];
  places: Place[] = [];
  isManageGenealogies: boolean = true;

  ngOnInit(): void {
    this.dataService.genealogyData$.subscribe((data) => {
      this.genealogyData = data;
    });
    this.individuals = this.parseService.parseJsonToListByIndividual(this.genealogyData);
    //this.generations = this.parseService.parseJsonToListByGeneration(this.genealogyData);
    this.families = this.parseService.parseJsonToListByFamily(this.genealogyData);
    this.places = this.parseService.parseJsonToListByPlace(this.genealogyData);
    console.log(this.genealogyData);
  }

  constructor(private dataService: DataService, public parseService: ParseService) {}
}