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