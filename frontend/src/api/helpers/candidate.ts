import type { CandidateModel } from "@/models/CandidateModel"
import { API } from "../base"
import { authorizationHeader } from "../base"

export const centerList = () => {
    return API.get('vaccine-centers')
}

export const register = (candidate: CandidateModel) => {
    return API.post('vaccine-candidates', candidate)
}