import { ComponentFixture, TestBed } from '@angular/core/testing';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { AnonymousHeaderComponent } from './components/anonymous-header/anonymous-header.component';
import { RouterOutlet } from '@angular/router';
import { RouterTestingModule } from '@angular/router/testing'


describe('ContactUsComponent', () => {
  let component: AppComponent;
  let fixture: ComponentFixture<AppComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterOutlet, RouterTestingModule],
      declarations: [AppComponent, HeaderComponent, FooterComponent, AnonymousHeaderComponent]
    });
    fixture = TestBed.createComponent(AppComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});