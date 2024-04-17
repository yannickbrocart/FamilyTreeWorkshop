import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GenealogyViewComponent } from './genealogy-view.component';

describe('GenealogyViewComponent', () => {
  let component: GenealogyViewComponent;
  let fixture: ComponentFixture<GenealogyViewComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GenealogyViewComponent]
    });
    fixture = TestBed.createComponent(GenealogyViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
