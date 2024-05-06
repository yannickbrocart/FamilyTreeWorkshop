import { TestBed } from '@angular/core/testing';
import { JwtAuthService } from './jwt-auth.service';
import { HttpClientModule } from '@angular/common/http';
import { HttpClient } from '@angular/common/http';

describe('JwtAuthService', () => {
  let service: JwtAuthService;
  let httpClient: HttpClient;


  beforeEach(() => {
    TestBed.configureTestingModule({
      imports:[HttpClientModule]
    });
    service = TestBed.inject(JwtAuthService);
    httpClient = TestBed.inject(HttpClient);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});