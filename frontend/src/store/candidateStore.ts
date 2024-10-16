import type { CandidateModel } from "@/models/CandidateModel"
import type { CenterModel } from "@/models/CenterModel"
import { defineStore } from "pinia"
import { ref, type Ref } from "vue"
import { centerList, register, search, 
    candidateList, candidateDetail, scheduleCandidate } from "@/api/helpers/candidate"
import { useAuthStore } from "./authStore"

export const useCandidateStore = defineStore("candidates", ()=> {

    const centers: Ref<CenterModel[]> = ref([])

    const candidates: Ref<CandidateModel[]> = ref([])

    const isFetching = ref<boolean>(false)

    const successMessage = ref<string>('')

    const errorMessage = ref<string>('')

    const errors = ref<any>({})

    const candidate = ref<CandidateModel>({} as CandidateModel)

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

    // search candidates
    const searchCandidates = async (data: string) => {
        await search(data).then(response => {
            if(response.data.errorMessage && response.data.data === null){
                errorMessage.value = response.data.errorMessage
            }else{
                candidate.value = response.data.data
            }            
        }).catch(error => {
            errorMessage.value = error.response.data.errors
        })
    }

    // status wise candidate list
    const statusWiseCandidateList = async (status: string) => {
        isFetching.value = true
        await candidateList(status, authStore.getToken()).then(response => {
            candidates.value = response.data.data
            isFetching.value = false
        }).catch(error => console.log(error))
    }

    // fetch single candidate by id
    const fetchCandidateInfo = async (id: number) => {
        isFetching.value = true
        await candidateDetail(id, authStore.getToken()).then(response => {
            candidate.value = response.data.data
            isFetching.value = false
        }).catch(error => console.log(error))
    }

    // assign schedule
    const assignSchedule = async (id: number, scheduled_at: string) => {
        await scheduleCandidate(id, scheduled_at, authStore.getToken()).then(response => {
            if(response.data.errorMessage){
                errorMessage.value = response.data.errorMessage
            }else{
                errorMessage.value = ''
            }

            if(response.data.successMessage){
                successMessage.value = response.data.successMessage
            }else{
                successMessage.value = ''
            }

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
        successMessage,
        searchCandidates,
        candidate,
        errorMessage,
        statusWiseCandidateList,
        candidates,
        fetchCandidateInfo,
        assignSchedule
    }
})