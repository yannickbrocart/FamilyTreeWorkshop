import { ComponentFixture, TestBed } from '@angular/core/testing';
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { HttpClient } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';
import { LoginComponent } from './login.component';
import { RouterTestingModule } from '@angular/router/testing'
import { JwtAuthService } from 'src/app/services/jwt-auth.service';

describe('LoginComponent', () => {
  let component: LoginComponent;
  let fixture: ComponentFixture<LoginComponent>;
  let httpClient: HttpClient;
  let httpTestingController: HttpTestingController;
  let jwtService: JwtAuthService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule, ReactiveFormsModule, RouterTestingModule],
      declarations: [LoginComponent],
    });
    fixture = TestBed.createComponent(LoginComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
    httpClient = TestBed.inject(HttpClient);
    httpTestingController = TestBed.inject(HttpTestingController);
    jwtService = TestBed.inject(JwtAuthService);
  });

  afterEach(() => {
    httpTestingController.verify();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('can get JWT token', () => {
    const username = 'mail@yannickbrocart.com';
    const password = 'Password123456$';
    let token = 'tocken';
    let errorInvalidCredential = {"code": 401, "message": "Invalid credentials."};

    jwtService.login(username, password).subscribe(
      response => expect(response).toMatch(token),
      fail
    );
    const req = httpTestingController.expectOne('https://127.0.0.1:8000/login_check');
    expect(req.request.url).toBe('https://127.0.0.1:8000/login_check');
    expect(req.request.method).toEqual('POST', 'should be POST method');
    expect(req.request.body).not.toBe(errorInvalidCredential);
  });
});
