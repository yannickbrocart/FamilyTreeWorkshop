import { Component } from '@angular/core';
import { JwtAuthService } from 'src/app/services/jwt-auth.service';
import { Router } from '@angular/router';
import { FormBuilder, Validators } from '@angular/forms';
import { extensionValidator, gedcomExtensionPattern } from 'src/app/shared/fileValidator.validator';

const digit = "0-9";
const alphabet = "A-ZÀ-ÿa-z_";
const alphanumeric = `${alphabet}${digit}`;
const itemDelimiter = new RegExp("(\\s+)");
const regexDelimiter = new RegExp(`^([${itemDelimiter}])`);
const regexLevel = new RegExp(`^([${digit}]*)`);
const regexTag = new RegExp(`^(_?[${alphanumeric}]{3,4})`);
const regexXRef = new RegExp(`^@([${alphanumeric}])([^@])*@`);
const regexValue = new RegExp(/^(.*)/);

export type Line = {
  level: number;
  tag: string;
  xrefId?: string;
  pointer?: string;
  value?: string;
}

export type GedcomFileInformation = {
  gedcomVersion?: string;
  gedcomForm?: string;
  gedcomCharacterSet?: string;
  gedcomDestination?: string;
  gedcomSource?: string;
  gedcomSourceName?: string;
  gedcomSourceCorporation?: string;
  gedcomSourceData?: string;
  gedcomSourceDataDate?: string;
  gedcomSourceDataTime?: string;
  gedcomSourceCopyright?:string;
  gedcomDate?: string;
  gedcomTime?: string;
  gedcomFile?: string;
  gedcomCopyright?:string;
  gedcomLanguage?: string;
  gedcomNote?: string;
}

@Component({
  selector: 'app-import',
  templateUrl: './import.component.html',
  styleUrls: ['./import.component.css']
})
export class ImportComponent {

  showError: boolean;
  urlFileToUpload: any;
  fileName: string = '';
  size: string = '';
  lastModified: string = '';
  gedcom: any;
  gedcomAsString: string = '';
  currentLine: string= '';
  linesNumber: number = 0;
  individualsNumber: number = 0;
  familiesNumber: number = 0;
  malesNumber: number = 0;
  femalesNumber: number = 0;
  gedcomFileInformation:GedcomFileInformation = {};

  importForm = this.formBuilder.group({
    file: ['', [
      Validators.required,
      extensionValidator(new RegExp(gedcomExtensionPattern), { requiresFile: true })]],
    genealogyName: ['', [
      Validators.required,
      Validators.minLength(6),
      Validators.maxLength(80)]],
  });

  
    constructor(public jwtAuthService: JwtAuthService, private formBuilder: FormBuilder,
      private router: Router) {
        this.showError = false;
        this.urlFileToUpload = null;
      }

    handleFileInputChange(event: any): void {
      this.urlFileToUpload = event.target.files;
      this.fileName = this.urlFileToUpload.item(0).name ? this.urlFileToUpload.item(0).name : 'NOT SUPPORTED';
      this.size = this.urlFileToUpload.item(0).size ? this.fileConvertSize(this.urlFileToUpload.item(0).size) : 'NOT SUPPORTED';
      this.lastModified = this.urlFileToUpload.item(0).lastModified ? new Date(this.urlFileToUpload.item(0).lastModified).toLocaleString('en-EN',{
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric'}) : 'NOT SUPPORTED';
      this.readGedcomFile();
    }

    onSubmitImportForm() { 
      const genealogyName = this.importForm.controls.genealogyName as unknown;
      this.jwtAuthService.import(this.urlFileToUpload.item(0), genealogyName as string)
          .subscribe(
            (response: any) => {
              this.router.navigate(['/genealogy'])
              }, 
            (error) => {
              alert(error);
              }
      )
    }

    fileConvertSize(fileInOctet: string): string {
      var fileSize: number = Math.abs(parseInt(fileInOctet, 10));
      var array: [number, string] [] = [
        [1, 'octets'], 
        [1024, 'ko'], 
        [1024 * 1024, 'Mo'], 
        [1024 * 1024 * 1024, 'Go'], 
        [1024 * 1024 * 1024 * 1024, 'To'],
        [1024 * 1024 * 1024 * 1024 * 1024, 'Po'],
        [1024 * 1024 * 1024 * 1024 * 1024 * 1024, 'Eo'],
        [1024 * 1024 * 1024 * 1024 * 1024 * 1024 * 1024, 'Zo']];
      for(var i=0; i < 8; i++){
        var limit: number = array[i][0];
        if(fileSize < limit) { 
          var result: number = array[i-1][0];
          var unit: string = array[i-1][1];
          return ((fileSize/result).toFixed(2) + ' ' + unit);
          }
      }
      return fileInOctet;
    }

    readGedcomFile() {
      var that = this;
      var insideHeader: boolean;
      var reader = new FileReader();
      var linesNumber: number = 0;
      that.gedcomFileInformation = {};
      reader.readAsText(this.urlFileToUpload.item(0));
      reader.onload = function(progressEvent) {
        var fileContentArray = (<string>this.result).split(/\r\n|\n/);
        for (var line = 0; line < fileContentArray.length - 1; line++) {
          var currentLine = that.extractLine(fileContentArray[line]);
          if (currentLine.level == 0 && currentLine.tag == 'HEAD') insideHeader = true;
          if (currentLine.level == 0 && currentLine.tag != 'HEAD') insideHeader = false;
          if (insideHeader) {
            if (currentLine.level == 2 && currentLine.tag == 'VERS') that.gedcomFileInformation.gedcomVersion = <string>currentLine.value;
            if (currentLine.level == 2 && currentLine.tag == 'FORM') that.gedcomFileInformation.gedcomForm = <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'CHAR') that.gedcomFileInformation.gedcomCharacterSet= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'DEST') that.gedcomFileInformation.gedcomDestination= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'SOUR') that.gedcomFileInformation.gedcomSource= <string>currentLine.value;
            if (currentLine.level == 2 && currentLine.tag == 'NAME') that.gedcomFileInformation.gedcomSourceName= <string>currentLine.value;
            if (currentLine.level == 2 && currentLine.tag == 'CORP') that.gedcomFileInformation.gedcomSourceCorporation= <string>currentLine.value;
            if (currentLine.level == 2 && currentLine.tag == 'DATA') that.gedcomFileInformation.gedcomSourceData= <string>currentLine.value;
            if (currentLine.level == 3 && currentLine.tag == 'DATE') that.gedcomFileInformation.gedcomSourceDataDate= <string>currentLine.value;
            if (currentLine.level == 4 && currentLine.tag == 'TIME') that.gedcomFileInformation.gedcomSourceDataTime= <string>currentLine.value;
            if (currentLine.level == 3 && currentLine.tag == 'COPR') that.gedcomFileInformation.gedcomSourceCopyright= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'DATE') that.gedcomFileInformation.gedcomDate= <string>currentLine.value;
            if (currentLine.level == 2 && currentLine.tag == 'TIME') that.gedcomFileInformation.gedcomTime= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'FILE') that.gedcomFileInformation.gedcomFile= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'COPR') that.gedcomFileInformation.gedcomCopyright= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'LANG') that.gedcomFileInformation.gedcomLanguage= <string>currentLine.value;
            if (currentLine.level == 1 && currentLine.tag == 'NOTE') that.gedcomFileInformation.gedcomNote= <string>currentLine.value;
          }         
          if (currentLine.level == 0 && currentLine.tag == 'INDI') that.individualsNumber++;
          if (currentLine.level == 0 && currentLine.tag == 'FAM') that.familiesNumber++;
          if (currentLine.level == 1 && currentLine.tag == 'SEX' && currentLine.value == 'M') that.malesNumber++;
          if (currentLine.level == 1 && currentLine.tag == 'SEX' && currentLine.value == 'F') that.femalesNumber++;
        }
        that.linesNumber = fileContentArray.length;
      };
      reader.onerror = function() {
        console.log(reader.error);
      };
    }

    extractLine(fileData: string): Line {      
      let xRefId: string | undefined = undefined;
      this.currentLine = fileData.trimStart();
      const level = parseInt(this.extractPieceOfLine(regexLevel));
      this.extractPieceOfLine(regexDelimiter);
      xRefId = this.extractPieceOfLine(regexXRef);
      this.extractPieceOfLine(regexDelimiter);
      if (xRefId) {
        this.extractPieceOfLine(regexDelimiter);
      }
      const tag = this.extractPieceOfLine(regexTag);
      let line: Line = { level, tag, };
      if (xRefId) line.xrefId = xRefId.replace(/@/gi,'');
      const delimiter = this.extractPieceOfLine(regexDelimiter);
      if(delimiter){
        const pointer = this.extractPieceOfLine(regexXRef);
        const value = this.extractPieceOfLine(regexValue);
        if (pointer) line.pointer = pointer.replace(/@/gi,'');
        else if (value) line.value = value;
      };
      return line;
    }

    extractPieceOfLine(regex: RegExp): any {
      const match = this.currentLine.match(regex);
      if(match) {
        this.currentLine = this.currentLine.substring(match[0].length);
        return match[0];
      }
    }

}
