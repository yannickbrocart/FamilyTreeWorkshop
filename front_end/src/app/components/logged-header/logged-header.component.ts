import { Component } from '@angular/core';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';

@Component({
  selector: 'app-logged-header',
  templateUrl: './logged-header.component.html',
  styleUrls: ['./logged-header.component.css']
})
export class LoggedHeaderComponent {

  constructor(private jwtAuthService: JwtAuthService) { }

  logout() {
    this.jwtAuthService.logout();
  }

}
