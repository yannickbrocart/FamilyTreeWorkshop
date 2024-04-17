// import {Location} from "@angular/common";
// import {TestBed, fakeAsync, tick} from '@angular/core/testing';
// import {RouterTestingModule} from "@angular/router/testing";
// import {Router} from "@angular/router";

// import { HomeComponent } from './modules/general/home/home.component';
// import { PageNotFoundComponent } from './modules/general/page-not-found/page-not-found.component';
// import { LegalNoticeComponent } from './modules/general/legal-notice/legal-notice.component';
// import { CookieManagementComponent } from './modules/general/cookie-management/cookie-management.component';
// import { DataProtectionComponent } from './modules/general/data-protection/data-protection.component';
// import { ContactUsComponent } from './modules/general/contact-us/contact-us.component';
// import { AccessibilityComponent } from './modules/general/accessibility/accessibility.component';
// import { LoginComponent } from './modules/general/login/login.component';
// import { ForgotPasswordComponent } from './modules/general/forgot-password/forgot-password.component';
// import { ResetPasswordComponent } from './modules/general/reset-password/reset-password.component';
// import { CheckEmailComponent } from './modules/general/check-email/check-email.component';
// import { SignupComponent } from './modules/general/signup/signup.component';
// import { ProfileComponent } from './modules/general/profile/profile.component';
// import { GenealogyComponent } from './modules/application/genealogy/genealogy.component';
// import { GenealogyManageComponent } from './modules/application/genealogy-manage/genealogy-manage.component';
// import { GenealogyViewComponent } from './modules/application/genealogy-view/genealogy-view.component';
// import { GenealogyListsComponent } from './modules/application/genealogy-lists/genealogy-lists.component';
// import { ImportComponent } from './modules/application/import/import.component';
// import { ExportComponent } from './modules/application/export/export.component';



// describe('Router: App', () => {
//   let location: Location;
//   let router: Router;
  
//   beforeEach(() => {
//     TestBed.configureTestingModule({
//       imports: [RouterTestingModule],
//       declarations: [ HomeComponent,
//         LegalNoticeComponent,
//         CookieManagementComponent
//       ]
//     });
//     router = TestBed.get(Router);
//     location = TestBed.get(Location);

//     router.initialNavigation();
//   });

//   it("fakeAsync works", fakeAsync(() => {
//     let promise = new Promise(resolve => {
//       setTimeout(resolve, 10);
//     });
//     let done = false;
//     promise.then(() => (done = true));
//     tick(50);
//     expect(done).toBeTruthy();
//   }));
  
//   it('navigate to "" redirects you to /home', fakeAsync(() => {
//     router.navigate(['']).then(() => {
//       expect(location.path()).toBe('/');
//     });
//   }));

//   it('navigate to "legalnotice" takes you to /legalnotice', fakeAsync(() => {
//     router.navigate(["legalnotice"]).then(() => {
//       expect(location.path()).toBe("/legalnotice");
//     });
//   }));

// });