import { ComponentFixture, TestBed } from '@angular/core/testing';
import { HeaderComponent } from './header.component';
import { AnonymousHeaderComponent } from '../anonymous-header/anonymous-header.component';
import { LoggedHeaderComponent } from '../logged-header/logged-header.component';
import { RouterTestingModule } from '@angular/router/testing'

describe('HeaderComponent', () => {
  let component: HeaderComponent;
  let fixture: ComponentFixture<HeaderComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterTestingModule],
      declarations: [HeaderComponent, AnonymousHeaderComponent, LoggedHeaderComponent ]
    });
    fixture = TestBed.createComponent(HeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
