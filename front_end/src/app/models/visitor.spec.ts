import { Visitor } from './visitor';

describe('Visitor', () => {
  it('should create an instance', () => {
    expect(new Visitor(
      'Yannick',
      'Brocart',
      'mail@yannickbrocart.com',
      '06 72 38 76 87',
      'This is my message!',
      'null'
    )).toBeTruthy();
  });
});
