import { Component } from '@angular/core';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent {
  isLoggedIn$: Observable<boolean> | any;

  constructor(private jwtAuthService: JwtAuthService) {}

  ngOnInit() {
    this.isLoggedIn$ = this.jwtAuthService.isLoggedIn;
  }
}
