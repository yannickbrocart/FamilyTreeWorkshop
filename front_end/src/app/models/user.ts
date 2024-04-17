export class User {
    constructor(
        public id: number | null | undefined,
        public email: any | null | undefined,
        public roles: [] | null | undefined,
        public password: string | null | undefined,
        public firstname: string | null | undefined,
        public lastname: string | null | undefined
        ) {}
}
