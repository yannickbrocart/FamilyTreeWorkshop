import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-forgot-password',
  templateUrl: './forgot-password.component.html',
  styleUrls: ['./forgot-password.component.css']
})
export class ForgotPasswordComponent {

  forgotpasswordForm = this.formBuilder.group({
    email: ['', [
      Validators.required, 
      Validators.email, 
      Validators.maxLength(180)]]
  });

  constructor(private formBuilder: FormBuilder, private jwtAuthService: JwtAuthService,
    private router: Router) { }

  onSubmitForgotpasswordForm() { 
    this.jwtAuthService.forgotPassword(this.forgotpasswordForm.value.email as string)
        .subscribe((response:any) => {
          this.router.navigate(['/checkemail']);
        });
  }

}
