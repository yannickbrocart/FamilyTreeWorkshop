import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GenealogyManageComponent } from './genealogy-manage.component';

describe('GenealogyManageComponent', () => {
  let component: GenealogyManageComponent;
  let fixture: ComponentFixture<GenealogyManageComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GenealogyManageComponent]
    });
    fixture = TestBed.createComponent(GenealogyManageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
