import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './modules/general/home/home.component';
import { PageNotFoundComponent } from './modules/general/page-not-found/page-not-found.component';
import { LegalNoticeComponent } from './modules/general/legal-notice/legal-notice.component';
import { CookieManagementComponent } from './modules/general/cookie-management/cookie-management.component';
import { DataProtectionComponent } from './modules/general/data-protection/data-protection.component';
import { ContactUsComponent } from './modules/general/contact-us/contact-us.component';
import { AccessibilityComponent } from './modules/general/accessibility/accessibility.component';
import { LoginComponent } from './modules/general/login/login.component';
import { ForgotPasswordComponent } from './modules/general/forgot-password/forgot-password.component';
import { ResetPasswordComponent } from './modules/general/reset-password/reset-password.component';
import { CheckEmailComponent } from './modules/general/check-email/check-email.component';
import { SignupComponent } from './modules/general/signup/signup.component';
import { ProfileComponent } from './modules/general/profile/profile.component';
import { GenealogyComponent } from './modules/application/genealogy/genealogy.component';
import { GenealogyManageComponent } from './modules/application/genealogy-manage/genealogy-manage.component';
import { GenealogyViewComponent } from './modules/application/genealogy-view/genealogy-view.component';
import { GenealogyListsComponent } from './modules/application/genealogy-lists/genealogy-lists.component';
import { ImportComponent } from './modules/application/import/import.component';
import { ExportComponent } from './modules/application/export/export.component';
 

export const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'legalnotice', component: LegalNoticeComponent },
  { path: 'cookiemanagement', component: CookieManagementComponent },
  { path: 'dataprotection', component: DataProtectionComponent },
  { path: 'contactus', component: ContactUsComponent },
  { path: 'accessibility', component: AccessibilityComponent },
  { path: 'login', component: LoginComponent },
  { path: 'forgotpassword', component: ForgotPasswordComponent },
  { path: 'resetpassword/:token', component: ResetPasswordComponent },
  { path: 'checkemail', component: CheckEmailComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'profile', component: ProfileComponent },
  { path: 'genealogy', component: GenealogyComponent },
  { path: 'genealogy/manage', component: GenealogyManageComponent },
  { path: 'genealogy/view', component: GenealogyViewComponent },
  { path: 'genealogy/lists', component: GenealogyListsComponent },
  { path: 'import', component: ImportComponent },
  { path: 'export', component: ExportComponent },
  { path: '**', component: PageNotFoundComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
