import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Visitor } from 'src/app/models/visitor';
import { namePattern, phonePattern }
  from 'src/app/shared/passwordValidator.validator';


@Component({
  selector: 'app-contact-us',
  templateUrl: './contact-us.component.html',
  styleUrls: ['./contact-us.component.css']
})
export class ContactUsComponent {

  visitor = new Visitor('', '', '', '', '', '');

  constructor(private formBuilder: FormBuilder) { }
  
  contactusForm = this.formBuilder.group({
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
    email: ['', [
      Validators.required, 
      Validators.email, 
      Validators.maxLength(180)]],
    phone: ['', [
      Validators.required,
      Validators.pattern(phonePattern)]],
    message: ['', [
      Validators.required,
      Validators.minLength(2)]],
    attachment: ['']
  });
  
  onSubmitContactForm() {
    this.visitor.firstname = this.contactusForm.value.firstname;
    this.visitor.lastname = this.contactusForm.value.lastname;
    this.visitor.email = this.contactusForm.value.email;
    this.visitor.phone = this.contactusForm.value.phone;
    this.visitor.message = this.contactusForm.value.message;
    this.visitor.attachment = this.contactusForm.value.attachment;
  }
  
}