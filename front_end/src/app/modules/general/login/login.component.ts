import { Component } from '@angular/core';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { FormBuilder, Validators } from '@angular/forms';
import { CookieService } from 'ngx-cookie-service';
import { Router } from '@angular/router';
import { patternValidator, atLeastOneDigitPattern, 
  atLeastOneUpperCasePattern, atLeastOneLowerCasePattern, 
  atLeastOneSpecialCharacterPattern } from 'src/app/shared/passwordValidator.validator';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  showError: boolean;
  public showPassword: boolean;

  loginForm = this.formBuilder.group({
    email: ['', [
      Validators.required, 
      Validators.email, 
      Validators.maxLength(180)]],
    password: ['', [
      Validators.required, 
      patternValidator(new RegExp(atLeastOneDigitPattern), {requiresDigit: true}),
      patternValidator(new RegExp(atLeastOneUpperCasePattern), {requiresUppercase: true}),
      patternValidator(new RegExp(atLeastOneLowerCasePattern), {requiresLowercase: true}),
      patternValidator(new RegExp(atLeastOneSpecialCharacterPattern), {requiresSpecialChars: true})]],
    rememberLoginControl: [false]
  });

  constructor(public jwtAuthService: JwtAuthService, private formBuilder: FormBuilder,
    private router: Router, private cookieService: CookieService) {
      this.loginForm.patchValue({
        email: this.cookieService.get('username'),
        password: this.cookieService.get('password')
      });
      this.showPassword = this.showError = false;
    if (this.loginForm.value.email !== '') this.loginForm.patchValue({rememberLoginControl: true}) ;
  }

  onSubmitLoginForm() { 
    if (this.loginForm.value.rememberLoginControl == true) {
      this.cookieService.set('username', this.loginForm.value.email as string);
      this.cookieService.set('password', this.loginForm.value.password as string);  
    } else {
      this.cookieService.delete('username');
      this.cookieService.delete('password');
      }
    this.jwtAuthService.login(this.loginForm.value.email as string, this.loginForm.value.password as string)
        .subscribe(
          (response: any) => {
            this.router.navigate(['/genealogy'])
            }, 
          (error) => {
            this.showError = true;
            }
    )}
}