import { ComponentFixture, TestBed } from '@angular/core/testing';
import { LoggedHeaderComponent } from './logged-header.component';
import { RouterTestingModule } from '@angular/router/testing'

describe('LoggedHeaderComponent', () => {
  let component: LoggedHeaderComponent;
  let fixture: ComponentFixture<LoggedHeaderComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterTestingModule],
      declarations: [LoggedHeaderComponent]
    });
    fixture = TestBed.createComponent(LoggedHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
