export class Visitor {
    constructor(
        public firstname: string | null | undefined,
        public lastname: string | null | undefined,
        public email: any | null | undefined,
        public phone: string | null | undefined,
        public message: string | null | undefined,
        public attachment: string | null | undefined
        ) {}
}
