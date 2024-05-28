import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { map, BehaviorSubject } from 'rxjs';
import { environment } from 'src/environments/environment';

const headers = new HttpHeaders()
  .set("Content-Type", "application/json");


@Injectable({
  providedIn: 'root'
})
export class JwtAuthService {
  private loggedIn = new BehaviorSubject<boolean>(false);
  eyeOn: any | null = document.getElementById('#eye-on');
  eyeOff: any | null = document.getElementById('#eye-off');

  constructor(private http: HttpClient, private router: Router) { }

  login(email: string, password: string) {
    return this.http.post(environment.apiURL + '/login_check', { 'username': email, 'password': password }).pipe(
      map((response: any) => {
        this.loggedIn.next(true);
        localStorage.setItem('jwt', JSON.stringify(response));
      }));
  }

  logout() {
    localStorage.removeItem('jwt');
    this.loggedIn.next(false);
    this.router.navigate(['/']);
  }

  get isLoggedIn() {
    return this.loggedIn.asObservable();
  }

  toggleShowPassword(showPassword: boolean): boolean {
    return showPassword = !showPassword;
    this.eyeOn.style.display = showPassword ? 'block' : 'none';
    this.eyeOff.style.display = showPassword ? 'none' : 'block';
  }

  forgotPassword(email: string) {
    return this.http.post(environment.apiURL + '/reset-password', { 'email': email });
  }

  resetPassword(token: string, newPassword: string) {
    return this.http.post(environment.apiURL + '/reset-password/reset', { 'token' : token, 'newPassword': newPassword });
  }

  signup(email: string, password: string, firstname: string, lastname: string, username: string) {
    return this.http.post(environment.apiURL + '/register', { 
      'email': email, 
      'password' : password,
      'firstname' : firstname,
      'lastname' : lastname,
      'username' : username
      })
  }

  import (file: String, genealogyName: String) {
    return this.http.post(environment.apiURL + '/files/import', {'file': file, 'genealogyName': name}, {headers})
   }

}
