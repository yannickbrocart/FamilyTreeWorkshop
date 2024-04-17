import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GenealogyComponent } from './genealogy.component';

describe('GenealogyComponent', () => {
  let component: GenealogyComponent;
  let fixture: ComponentFixture<GenealogyComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GenealogyComponent]
    });
    fixture = TestBed.createComponent(GenealogyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
