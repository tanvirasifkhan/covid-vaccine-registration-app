import { defineStore } from "pinia"
import { login, logout } from "@/api/helpers/auth"
import type { LoginUserModel } from "@/models/LoginUserModel"
import { ref } from "vue"

export const useAuthStore = defineStore("auth", ()=> {
    
    const setUser = (data: any) => localStorage.setItem("user", JSON.stringify(data))

    const getUser = () => JSON.parse(localStorage.getItem("user") as string)

    const getToken = () => getUser().token

    const errors = ref<any>({})

    const errorMessage = ref<string>('')

    const successMessage = ref<string>('')

    // is logged in
    const isAuthenticated = () => getUser() !== null

    // sign the admin into the system
    const signIn = async (user: LoginUserModel) => {
        await login(user).then(response => {

            setUser(response.data.data)

            if(response.data.successMessage && response.data.data !== null){
                successMessage.value = response.data.successMessage
                errors.value = {}
            }else{
                successMessage.value = ''
                errors.value = {}
            }

            if(response.data.errorMessage && response.data.data === null){
                errorMessage.value = response.data.errorMessage
                errors.value = {}
            }else{
                errors.value = {}
                errorMessage.value = ''
            }   

        }).catch(error => {
            errors.value = error.response.data.errors
        })
    }

    // sign the admin out of the system
    const signOut = async () => {
        await logout(getToken()).then(response => {
            setUser(null)
            localStorage.removeItem("user")
            successMessage.value = response.data.successMessage
            errorMessage.value = ''
        }).catch(error => console.log(error))
    }

    return {
        signIn,
        signOut,
        isAuthenticated,
        getToken,
        getUser,
        errors,
        errorMessage,
        successMessage
    }
})