import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { ActivatedRoute, Router } from '@angular/router';
import { passwordPattern } from 'src/app/shared/passwordValidator.validator';

@Component({
  selector: 'app-reset-password',
  templateUrl: './reset-password.component.html',
  styleUrls: ['./reset-password.component.css']
})
export class ResetPasswordComponent {

  email: any | null;
  token: any | null;
  showSuccess: boolean;
  showError: boolean;
  public showPassword: boolean;

  resetForm = this.formBuilder.group({
    newPassword: ['', [
      Validators.required, 
      Validators.pattern(passwordPattern)]],
    confirmNewPassword: ['', [
      Validators.required, 
      Validators.pattern(passwordPattern)]]
  });

  constructor(public jwtAuthService: JwtAuthService, private formBuilder: FormBuilder,
    private router: Router, private route: ActivatedRoute) { 
      this.showPassword = this.showError = this.showSuccess = false;
     }

  onSubmitResetForm() { 
    if (this.resetForm.value.newPassword === this.resetForm.value.confirmNewPassword) {
      this.route.params.subscribe(params => {
        this.token = params})
      this.jwtAuthService.resetPassword(this.token, this.resetForm.value.newPassword as string)
      .subscribe((response: any) => {
        this.showSuccess = true;
        setTimeout(() => { this.router.navigate(['/login']) }, 4000);
      }, (error) => {
        this.showError = true;
        });
    }
  }

}
