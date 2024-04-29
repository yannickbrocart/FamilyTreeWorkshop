import { ComponentFixture, TestBed } from '@angular/core/testing';
import { AnonymousHeaderComponent } from './anonymous-header.component';
import { HeaderComponent } from '../header/header.component';
import { RouterTestingModule } from '@angular/router/testing'

describe('AnonymousHeaderComponent', () => {
  let component: AnonymousHeaderComponent;
  let fixture: ComponentFixture<AnonymousHeaderComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterTestingModule],
      declarations: [AnonymousHeaderComponent, HeaderComponent]
    });
    fixture = TestBed.createComponent(AnonymousHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
