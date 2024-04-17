import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AnonymousHeaderComponent } from './anonymous-header.component';

describe('AnonymousHeaderComponent', () => {
  let component: AnonymousHeaderComponent;
  let fixture: ComponentFixture<AnonymousHeaderComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [AnonymousHeaderComponent]
    });
    fixture = TestBed.createComponent(AnonymousHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
