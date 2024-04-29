import { AbstractControl, ValidationErrors, ValidatorFn } from '@angular/forms';

const countryCodePattern = '^(((00|[\\+])?[(]?[0-9]{2}[)]?[\\s.-]]?)|0)';
const digitPattern = '[0-9][\\s.-]?(([0-9]{2}[\\s.-]?)){4}$';
export const atLeastOneUpperCasePattern = '(?=.*?[A-Z])';
export const atLeastOneLowerCasePattern = '(?=.*?[a-z])';
export const atLeastOneDigitPattern = '(?=.*?[0-9])';
export const atLeastOneSpecialCharacterPattern = '(?=.*\\W)';
export const passwordPattern = 
  '^' + atLeastOneUpperCasePattern + atLeastOneLowerCasePattern + 
  atLeastOneDigitPattern + atLeastOneSpecialCharacterPattern + '.{12,80}$';
export const phonePattern = countryCodePattern + digitPattern;
export const namePattern = '^[A-Z][A-Za-z\\s\'-]*$';
export const usernamePattern = '^[A-Z][A-Za-z0-9-_]*$';


export function matchValidator(control: AbstractControl) {
  const password: string = control.value.password;
  const confirmPassword: string = control.value.confirmPassword;
  if (!password || !confirmPassword) return null;
  if (password === confirmPassword) {
    return null; 
    control.value.confirmPassword.setErrors({mismatch: true});
  }
  else return {mismatch: true};
}

export function patternValidator(regex: RegExp, error: ValidationErrors): ValidatorFn {
  return (control: AbstractControl) => {
    if (!control.value) return null;
    const valid = regex.test(control.value);
    return valid ? null : error;
  };
}