export interface CenterModel {
    id: number,
    name: string,
    capacity: number,
    totalOccupied: number,
    address?: string,
    canAccomodate: boolean
}