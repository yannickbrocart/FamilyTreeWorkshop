import { Component } from '@angular/core';
import { DataService } from 'src/app/services/data.service';


export type Genealogy = {
  id: number; 
  name: string;
  lastModifiedDate: string;
}

@Component({
  selector: 'app-genealogy',
  templateUrl: './genealogy.component.html',
  styleUrls: ['./genealogy.component.css']
})
export class GenealogyComponent{
  isShowIndividual: boolean = true;
  isManageGenealogies: boolean = true;
  genealogyToShow: Genealogy = {
    id: 0, 
    name: 'Généalogie de Yannick Brocart', 
    lastModifiedDate: ''};

  constructor(private dataService: DataService) {
    this.dataService.isManageGenealogies$.subscribe(data => {
      this.isManageGenealogies = data;
    });
  }
}
