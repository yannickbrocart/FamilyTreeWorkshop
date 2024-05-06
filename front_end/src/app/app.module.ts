import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule} from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { AnonymousHeaderComponent } from './components/anonymous-header/anonymous-header.component';
import { LoggedHeaderComponent } from './components/logged-header/logged-header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HomeComponent } from './modules/general/home/home.component';
import { PageNotFoundComponent } from './modules/general/page-not-found/page-not-found.component';
import { LoginComponent } from './modules/general/login/login.component';
import { ForgotPasswordComponent } from './modules/general/forgot-password/forgot-password.component';
import { SignupComponent } from './modules/general/signup/signup.component';
import { ResetPasswordComponent } from './modules/general/reset-password/reset-password.component';
import { CheckEmailComponent } from './modules/general/check-email/check-email.component';
import { ProfileComponent } from './modules/general/profile/profile.component';
import { LegalNoticeComponent } from './modules/general/legal-notice/legal-notice.component';
import { CookieManagementComponent } from './modules/general/cookie-management/cookie-management.component';
import { DataProtectionComponent } from './modules/general/data-protection/data-protection.component';
import { ContactUsComponent } from './modules/general/contact-us/contact-us.component';
import { AccessibilityComponent } from './modules/general/accessibility/accessibility.component';
import { ImportComponent } from './modules/application/import/import.component';
import { ExportComponent } from './modules/application/export/export.component';
import { GenealogyComponent } from './modules/application/genealogy/genealogy.component';
import { GenealogyManageComponent } from './modules/application/genealogy-manage/genealogy-manage.component';
import { GenealogyViewComponent } from './modules/application/genealogy-view/genealogy-view.component';
import { GenealogyListsComponent } from './modules/application/genealogy-lists/genealogy-lists.component'

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    AnonymousHeaderComponent,
    LoggedHeaderComponent,
    FooterComponent,
    HomeComponent,
    PageNotFoundComponent,
    LoginComponent,
    ForgotPasswordComponent,
    SignupComponent,
    ProfileComponent,
    LegalNoticeComponent,
    CookieManagementComponent,
    DataProtectionComponent,
    ContactUsComponent,
    AccessibilityComponent,
    ImportComponent,
    ExportComponent,
    GenealogyComponent,
    GenealogyManageComponent,
    GenealogyViewComponent,
    GenealogyListsComponent,
    ResetPasswordComponent,
    CheckEmailComponent,
    GenealogyManageComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    FormsModule,
    RouterModule,
  ],
  providers: [HttpClientModule],
  bootstrap: [AppComponent],
})
export class AppModule { }
