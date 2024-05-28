import { HttpClient, HttpErrorResponse, HttpHeaders, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Subject } from 'rxjs';

const apiUrl = 'https://127.0.0.1:8000';
const headers = new HttpHeaders()
	.set("Content-Type", "application/json");

@Injectable({
  providedIn: 'root'
})
export class DataService {

  private isManageGenealogiesData = new Subject<any>();
  isManageGenealogies$ = this.isManageGenealogiesData.asObservable();

  constructor(private http: HttpClient, private router: Router) { }
  
  sendIsManageGenealogies(data: boolean) { 
    this.isManageGenealogiesData.next(data); 
  }

  getGenealogies() {
    return this.http.get(apiUrl + '/genealogy/manage/getall', {headers});
  }

  openGenealogyById(id: number) {
    return this.http.get(apiUrl + '/genealogy/manage/getbyid/' + id, {headers});
  }

  renameGenealogy(id: number, name: string) {
    return this.http.patch(apiUrl + '/genealogy/manage/renamebyid/' + id, {'name': name});
  }

  deleteGenealogy(id: number) {
    return this.http.delete(apiUrl + '/genealogy/manage/deletebyid/' + id);
  }

}