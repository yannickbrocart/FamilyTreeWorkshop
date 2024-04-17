import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GenealogyListsComponent } from './genealogy-lists.component';

describe('GenealogyListsComponent', () => {
  let component: GenealogyListsComponent;
  let fixture: ComponentFixture<GenealogyListsComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GenealogyListsComponent]
    });
    fixture = TestBed.createComponent(GenealogyListsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
