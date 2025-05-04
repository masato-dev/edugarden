class UserAddress {
    constructor(id, phone, name, cityName, districtName, wardName, cityId, districtId, wardId, userId) {
        this.id = id;
        this.phone = phone;
        this.name = name;
        this.cityName = cityName;
        this.districtName = districtName;
        this.wardName = wardName;
        this.cityId = cityId;
        this.districtId = districtId;
        this.wardId = wardId;
        this.userId = userId;
    }

    static fromJson(json) {
        return new UserAddress(
            json.id,
            json.phone,
            json.name,
            json.city_name,
            json.district_name,
            json.ward_name,
            json.city_id,
            json.district_id,
            json.ward_id,
            json.user_id,
        );
    }
}

window.UserAddress = UserAddress;