import type { CandidateModel } from "@/models/CandidateModel"
import type { CenterModel } from "@/models/CenterModel"
import { defineStore } from "pinia"
import { ref, type Ref } from "vue"
import { centerList, register } from "@/api/helpers/candidate"
import { useAuthStore } from "./authStore"

export const useCandidateStore = defineStore("candidates", ()=> {

    const centers: Ref<CenterModel[]> = ref([])

    const isFetching = ref<boolean>(false)

    const successMessage = ref<string>('')

    const errors = ref<any>({})

    const authStore = useAuthStore()

    // fetch all the centers
    const fetchAllCenters = async () => {
        isFetching.value = true
        await centerList().then(response => {
            centers.value = response.data.data
            isFetching.value = false
        }).catch(error => console.log(error))
    }

    // register candidates
    const registerCandidate = async (candidate: CandidateModel) => {
        await register(candidate).then(response => {
            successMessage.value = response.data.successMessage
            errors.value = {}
        }).catch(error => {
            errors.value = error.response.data.errors
        })
    }

    return {
        centers,
        fetchAllCenters,
        isFetching,
        registerCandidate,
        errors,
        successMessage
    }
})