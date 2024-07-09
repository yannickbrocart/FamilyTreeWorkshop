import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Subject, BehaviorSubject } from 'rxjs';
import { environment } from 'src/environments/environment';
import { CookieService } from 'ngx-cookie-service';

const headers = new HttpHeaders().set('Content-Type', 'application/json');

@Injectable({
  providedIn: 'root',
})
export class DataService {
  private $isManageGenealogiesData: BehaviorSubject<boolean> = new BehaviorSubject<boolean>(true);
  isManageGenealogies$ = this.$isManageGenealogiesData.asObservable();

  private $genealogyData: BehaviorSubject<any> = new BehaviorSubject<any>([]);
  genealogyData$ = this.$genealogyData.asObservable();


  constructor(private http: HttpClient, private router: Router, private cookieService: CookieService) {}


  sendIsManageGenealogies(data: boolean): void {
    this.$isManageGenealogiesData.next(data); 
  }

  sendGenealogyData(data: any): void {
    this.$genealogyData.next(data);
  }

  getGenealogies() {
    var userEmail = this.cookieService.get('username');
    return this.http.post(environment.apiURL + '/genealogy/manage/getallbyuser', {
      'userEmail': userEmail},
      { headers });
  }

  openGenealogyById(id: number) {
    return this.http.post(environment.apiURL + '/genealogy/manage/getbyid/' + id,
      { headers });
  }

  renameGenealogy(id: number, name: string) {
    return this.http.patch(environment.apiURL + '/genealogy/manage/renamebyid/' + id,
      { 'name': name });
  }

  deleteGenealogy(id: number) {
    return this.http.delete(environment.apiURL + '/genealogy/manage/deletebyid/' + id);
  }

  importGedcom (file: String, genealogyName: String) {
    return this.http.post(
      environment.apiURL + '/files/import', {
        'file': file, 
        'genealogyName': genealogyName}, 
        {headers})
   }
}
