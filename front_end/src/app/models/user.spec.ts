import { User } from './user';

describe('User', () => {
  it('should create an instance', () => {
    expect(new User(
      4,
      'mail@yannickbrocart.com',
      ['ROLE_ADMIN'],
      'password123',
      'Yannick',
      'Brocart'
    )).toBeTruthy();
  });
});
