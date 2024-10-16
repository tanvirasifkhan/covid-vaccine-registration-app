import type { CandidateModel } from "@/models/CandidateModel"
import { API } from "../base"
import { authorizationHeader } from "../base"

export const centerList = () => {
    return API.get('vaccine-centers')
}

export const register = (candidate: CandidateModel) => {
    return API.post('vaccine-candidates', candidate)
}

export const search = (data: string) => {
    return API.get(`vaccine-candidates/search/by-nid?nid=${data}`)
}

export const candidateList = (status: string, token: string) => {
    return API.get(`vaccine-candidates/${status}/list`, authorizationHeader(token))
}

export const candidateDetail = (id: number, token: string) => {
    return API.get(`vaccine-candidates/${id}`, authorizationHeader(token))
}

export const scheduleCandidate = (id: number, scheduled_at: string, token: string) => {
    return API.patch(`vaccine-candidates/${id}/schedule`, { scheduled_at: scheduled_at }, authorizationHeader(token))
}