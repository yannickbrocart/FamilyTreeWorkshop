import { AbstractControl, ValidationErrors, ValidatorFn } from '@angular/forms';

export const gedcomExtensionPattern = '^.+\.(?:[gG][eE][dD])$';

export function extensionValidator(regex: RegExp, error: ValidationErrors): ValidatorFn {
  return (control: AbstractControl) => {
    if (!control.value) return null;
    const valid = regex.test(control.value);
    return valid ? null : error;
  };
}