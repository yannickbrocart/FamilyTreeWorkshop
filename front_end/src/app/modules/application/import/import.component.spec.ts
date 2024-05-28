import { ComponentFixture, TestBed } from '@angular/core/testing';
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { HttpClient } from '@angular/common/http';
import { ImportComponent } from './import.component';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { ReactiveFormsModule } from '@angular/forms';
import { RouterTestingModule } from '@angular/router/testing'

describe('ImportComponent', () => {
  let component: ImportComponent;
  let fixture: ComponentFixture<ImportComponent>;
  let httpClient: HttpClient;
  let httpTestingController: HttpTestingController;
  let jwtService: JwtAuthService;


  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule, ReactiveFormsModule, RouterTestingModule],
      declarations: [ImportComponent]
    });
    fixture = TestBed.createComponent(ImportComponent);
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
  
  it('can get Gedcom file data', () => {
    const file = 'C:/wamp64/www/FamilyTreeWorkshop/back_end/public/Gedcom555Sample.ged';
    const genealogyName = 'GenealogySample';
    const genealogy = 'fileName":"Gedcom555Sample.ged';
    const errorInvalidCredential = {"code": 401, "message": "Invalid credentials."};


    jwtService.import(file, genealogyName).subscribe(
      response => expect(response).toContain(genealogy),
      fail
    );
    const req = httpTestingController.expectOne('https://127.0.0.1:8000/files/import');
    expect(req.request.url).toBe('https://127.0.0.1:8000/files/import');
    expect(req.request.method).toEqual('POST', 'should be POST method');
    expect(req.request.body).not.toBe(errorInvalidCredential);
  });

});
