import { Component } from '@angular/core';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { CookieService } from 'ngx-cookie-service';

@Component({
  selector: 'app-logged-header',
  templateUrl: './logged-header.component.html',
  styleUrls: ['./logged-header.component.css']
})
export class LoggedHeaderComponent {

  constructor(private jwtAuthService: JwtAuthService, private cookieService: CookieService) { }

  logout() {
    this.cookieService.delete('username');
    this.cookieService.delete('password');
    this.jwtAuthService.logout();
  }

}
