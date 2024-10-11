import type { CenterModel } from "./CenterModel"

export interface CandidateModel {
    id?: number,
    center?: CenterModel,
    center_id: number,
    name: string,
    email: string,
    phone: string,
    nid: string,
    status?: string,
    scheduled_at?: {
        raw: string,
        human: string
    }
}