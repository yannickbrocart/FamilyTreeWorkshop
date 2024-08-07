import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { map, BehaviorSubject } from 'rxjs';
import { environment } from 'src/environments/environment';
import { CookieService } from 'ngx-cookie-service';


@Injectable({
  providedIn: 'root'
})
export class JwtAuthService {
  private loggedIn = new BehaviorSubject<boolean>(false);
  eyeOn: any | null = document.getElementById('#eye-on');
  eyeOff: any | null = document.getElementById('#eye-off');

  constructor(private http: HttpClient, private router: Router, private cookieService: CookieService) { }

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
  if(this.cookieService.get('username')) this.loggedIn.next(true);
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

}
