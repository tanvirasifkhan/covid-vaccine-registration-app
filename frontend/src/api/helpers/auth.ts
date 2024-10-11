import { type LoginUserModel } from "@/models/LoginUserModel"
import { API } from "../base"
import { authorizationHeader } from "../base"

export const login = (user: LoginUserModel) => {
    return API.post('login', user)
}

export const logout = (token: string) => {
    return API.post('logout', null, authorizationHeader(token))
}