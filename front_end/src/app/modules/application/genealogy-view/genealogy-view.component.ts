import { Component, Input } from '@angular/core';
import { Genealogy } from '../genealogy/genealogy.component';

@Component({
  selector: 'app-genealogy-view',
  templateUrl: './genealogy-view.component.html',
  styleUrls: ['./genealogy-view.component.css']
})
export class GenealogyViewComponent {
  @Input() genealogy: Genealogy  | undefined;
}
