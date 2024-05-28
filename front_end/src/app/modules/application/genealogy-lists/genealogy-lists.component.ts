import { Component } from '@angular/core';

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
  lattitude?: string;
  longitude?: string;
}

@Component({
  selector: 'app-genealogy-lists',
  templateUrl: './genealogy-lists.component.html',
  styleUrls: ['./genealogy-lists.component.css']
})
export class GenealogyListsComponent {
  
  isIndividualList: boolean = true;
  isGenerationList: boolean = false;
  isFamilyList: boolean = false;
  isPlaceList: boolean = false;

  individuals: Individual[] = [
    { firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'},
    { firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'},
    { firstName: 'Jacqueline', lastName: 'Lieudenot', sex: 'F', birthDate: '1947'},
    { firstName: 'Marius', lastName: 'Brocart', sex: 'M', birthDate: '1920', deathDate: '1998'},
    { firstName: 'Odette', lastName: 'Cellière', sex: 'F', birthDate: '1999', deathDate: '2018'},
    { firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'},
    { firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'},
    { firstName: 'Jacqueline', lastName: 'Lieudenot', sex: 'F', birthDate: '1947'},
    { firstName: 'Marius', lastName: 'Brocart', sex: 'M', birthDate: '1920', deathDate: '1998'},
    { firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'},
    { firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'},
    { firstName: 'Jacqueline', lastName: 'Lieudenot', sex: 'F', birthDate: '1947'},
    { firstName: 'Marius', lastName: 'Brocart', sex: 'M', birthDate: '1920', deathDate: '1998'}
  ];

  generations: Generation[] = [
    { generation: 1,  individuals: [{ firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'}] },
    { generation: 2,  individuals: [{ firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'},
                                    { firstName: 'Jacqueline', lastName: 'Lieudenot', sex: 'F', birthDate: '1947'}] },
    { generation: 3,  individuals: [{ firstName: 'Marius', lastName: 'Brocart', sex: 'M', birthDate: '1920', deathDate: '1998'},
                                    { firstName: 'Odette', lastName: 'Cellière', sex: 'F', birthDate: '1999', deathDate: '2018'},
                                    { firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'},
                                    { firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'}] }
  ];


  families: Family[] = [
    { id: 1, husband: 'Pierre-Alain BROCART', wife: 'Jacqueline LIEUDENOT', 
      childs: [{ firstName: 'Yannick', lastName: 'Brocart', sex: 'M', birthDate: '1971'}]},
    { id: 2, husband: 'Marius BROCART', wife: 'Odette CELLIERE', 
      childs: [{ firstName: 'Pierre-Alain', lastName: 'Brocart', sex: 'M', birthDate: '1945'}]},
    { id: 3, husband: 'René LIEUDENOT', wife: 'Marie BRAVY', 
      childs: [
        { firstName: 'Jacqueline', lastName: 'Lieudenot', sex: 'F', birthDate: '1947'},
        { firstName: 'Michèle', lastName: 'Lieudenot', sex: 'F', birthDate: '1949'},
      ]}
  ];

  places: Place[] = [
    { name: 'Montluçon', lattitude: '46.3333', longitude: '2.6' },
    { name: 'Nice', lattitude: '43.7031', longitude: '7.2661' },
    { name: 'Saint-Amand Montrond', lattitude: '46.7167', longitude: '2.5167' }
  ];
    
}