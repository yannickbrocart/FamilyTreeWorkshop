import { ComponentFixture, TestBed } from '@angular/core/testing';
import { AccessibilityComponent } from './accessibility.component';
import { RouterTestingModule } from '@angular/router/testing'

describe('AccessibilityComponent', () => {
  let component: AccessibilityComponent;
  let fixture: ComponentFixture<AccessibilityComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterTestingModule],
      declarations: [AccessibilityComponent]
    });
    fixture = TestBed.createComponent(AccessibilityComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
