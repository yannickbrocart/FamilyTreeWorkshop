import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { ActivatedRoute, Router } from '@angular/router';
import { matchValidator, patternValidator, atLeastOneDigitPattern, 
  atLeastOneUpperCasePattern, atLeastOneLowerCasePattern, 
  atLeastOneSpecialCharacterPattern, namePattern, usernamePattern }
  from 'src/app/shared/passwordValidator.validator';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent {

  showSuccess: boolean;
  showError: boolean;
  public showPassword: boolean;

  signupForm = this.formBuilder.group({
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
    confirmPassword: ['', [
      Validators.required]],      
    firstname: ['', [
      Validators.required,
      Validators.minLength(2),
      Validators.maxLength(80),
      Validators.pattern(namePattern)]],
    lastname: ['', [
      Validators.required,
      Validators.minLength(2),
      Validators.maxLength(80),
      Validators.pattern(namePattern)]],
    username: ['', [
      Validators.required,
      Validators.minLength(2),
      Validators.maxLength(80),
      Validators.pattern(usernamePattern)]],
    }, 
    {validators: [matchValidator]}
  );

  constructor(public jwtAuthService: JwtAuthService, private formBuilder: FormBuilder,
    private router: Router, private route: ActivatedRoute) { 
      this.showPassword = this.showError = this.showSuccess = false;
     }

  onSubmitSignupForm() { 
    if (this.signupForm.value.password === this.signupForm.value.confirmPassword) {
      this.jwtAuthService.signup(
        this.signupForm.value.email as string, 
        this.signupForm.value.password as string,
        this.signupForm.value.firstname as string,
        this.signupForm.value.lastname as string,
        this.signupForm.value.username as string)
      .subscribe((response: any) => {
        this.showSuccess = true;
        setTimeout(() => { this.router.navigate(['/login']) }, 4000);
      }, (error) => {
        this.showError = true;
        });
    }
  }

}
