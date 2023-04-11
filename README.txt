use dbforlab	// Это команда для создания БД

db.createCollection('product')	// Это команда для создания колекции "product"

show collections   // Это команда для просмотра всех колекций. Если высветится "product", тогда все хорошо!

// Это команда для добавления документов. Пишешь все в 1 рядок!
db.product.insertMany([
	{type: "VideoCard", name: "GTX 1080", price: 400, quantity: 0, vendor: "Nvidia" },
	{type: "VideoCard", name: "RTX 2080", price: 600, quantity: 10, vendor: "Nvidia"},
	{type: "VideoCard", name: "RTX 3080", price: 800, quantity: 20, vendor: "Nvidia"},
	{type: "SSD", name: "Crucial MX500 480Gb", price: 50, quantity: 33, vendor: "Crucial" },
	{type: "SSD", name: "Kingston A400 2Tb", price: 300, quantity: 5, vendor: "Kingston"},
	{type: "SSD", name: "Samsung 870 EVO 1Tb", price: 100, quantity: 0, vendor: "Samsung"},
	{type: "Processor", name: "Core i7 7700k", price: 350, quantity: 0, vendor: "Intel" },
	{type: "Processor", name: "Core i9 13900k", price: 1000, quantity: 2, vendor: "Intel"},
	{type: "Processor", name: "Core i9 9900k", price: 800, quantity: 5, vendor: "Intel"},
	{type: "Motherboard", name: "ROG Maximus Z690", price: 1500, quantity: 1, vendor: "Asus" },
	{type: "Motherboard", name: "ROG STRIX Z790-A", price: 500, quantity: 11, vendor: "Asus"},
	{type: "Motherboard", name: "MPG Z690 CARBON", price: 600, quantity: 5, vendor: "MSI"}
])

db.product.find().pretty()	// Команда для проверки, добавились ли все элементы в БД
