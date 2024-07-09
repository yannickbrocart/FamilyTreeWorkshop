import { Component, Input } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { DataService } from 'src/app/services/data.service';
import { Genealogy } from '../genealogy/genealogy.component';

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

  sendGenealogyData(data: any) { 
    this.dataService.sendGenealogyData(data); 
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
       this.sendGenealogyData(response);
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
