USE [SoftExpert]
GO
/****** Object:  Table [dbo].[produtos]    Script Date: 13/12/2021 21:36:24 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[produtos](
	[id_produto] [bigint] IDENTITY(1,1) NOT NULL,
	[id_tipo_produto] [bigint] NOT NULL,
	[nome] [varchar](500) NOT NULL,
	[valor] [money] NOT NULL,
 CONSTRAINT [PK_produtos] PRIMARY KEY CLUSTERED 
(
	[id_produto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tipos_produtos]    Script Date: 13/12/2021 21:36:24 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipos_produtos](
	[id_tipo_produto] [bigint] IDENTITY(1,1) NOT NULL,
	[tipo_nome] [varchar](500) NOT NULL,
	[id_imposto] [bigint] NOT NULL,
 CONSTRAINT [PK_tipos_produtos] PRIMARY KEY CLUSTERED 
(
	[id_tipo_produto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[valores_percentuais]    Script Date: 13/12/2021 21:36:24 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[valores_percentuais](
	[id_imposto] [bigint] IDENTITY(1,1) NOT NULL,
	[percental] [varchar](50) NOT NULL,
	[nome] [varchar](500) NULL,
 CONSTRAINT [PK_valores_percentuais] PRIMARY KEY CLUSTERED 
(
	[id_imposto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[vendas]    Script Date: 13/12/2021 21:36:24 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[vendas](
	[id_venda] [bigint] IDENTITY(1,1) NOT NULL,
	[data_venda] [date] NOT NULL,
	[valor_venda] [money] NOT NULL,
 CONSTRAINT [PK_vendas] PRIMARY KEY CLUSTERED 
(
	[id_venda] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[vendaXproduto]    Script Date: 13/12/2021 21:36:24 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[vendaXproduto](
	[id_venda] [bigint] NOT NULL,
	[id_produto] [bigint] NOT NULL
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[produtos] ON 

INSERT [dbo].[produtos] ([id_produto], [id_tipo_produto], [nome], [valor]) VALUES (1, 1, N'Televisão LG UHD AI Think 55b', 3500.0000)
INSERT [dbo].[produtos] ([id_produto], [id_tipo_produto], [nome], [valor]) VALUES (2, 3, N'Microondas', 750.0000)
INSERT [dbo].[produtos] ([id_produto], [id_tipo_produto], [nome], [valor]) VALUES (5, 3, N'Lavadoura', 4000.0000)
SET IDENTITY_INSERT [dbo].[produtos] OFF
GO
SET IDENTITY_INSERT [dbo].[tipos_produtos] ON 

INSERT [dbo].[tipos_produtos] ([id_tipo_produto], [tipo_nome], [id_imposto]) VALUES (1, N'Eletroeletônico', 1)
INSERT [dbo].[tipos_produtos] ([id_tipo_produto], [tipo_nome], [id_imposto]) VALUES (3, N'Eletrodoméstico', 2)
SET IDENTITY_INSERT [dbo].[tipos_produtos] OFF
GO
SET IDENTITY_INSERT [dbo].[valores_percentuais] ON 

INSERT [dbo].[valores_percentuais] ([id_imposto], [percental], [nome]) VALUES (1, N'0.05', N'TESTE1')
INSERT [dbo].[valores_percentuais] ([id_imposto], [percental], [nome]) VALUES (2, N'1.00', N'TESTE2')
INSERT [dbo].[valores_percentuais] ([id_imposto], [percental], [nome]) VALUES (3, N'3.50', N'TESTE3')
INSERT [dbo].[valores_percentuais] ([id_imposto], [percental], [nome]) VALUES (4, N'25.00', N'TESTE4')
INSERT [dbo].[valores_percentuais] ([id_imposto], [percental], [nome]) VALUES (7, N'06.15', N'TESTE5')
INSERT [dbo].[valores_percentuais] ([id_imposto], [percental], [nome]) VALUES (8, N'06.15', N'TESTE6')
SET IDENTITY_INSERT [dbo].[valores_percentuais] OFF
GO
SET IDENTITY_INSERT [dbo].[vendas] ON 

INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (1, CAST(N'2021-12-13' AS Date), 100.0000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (2, CAST(N'2021-12-13' AS Date), 100.0000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (3, CAST(N'2021-12-13' AS Date), 100.0000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (4, CAST(N'2021-12-13' AS Date), 21010.5000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (5, CAST(N'2021-12-13' AS Date), 5302.5000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (6, CAST(N'2021-12-13' AS Date), 40905.0000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (7, CAST(N'2021-12-13' AS Date), 9276.0000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (8, CAST(N'2021-12-13' AS Date), 3501.7500)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (9, CAST(N'2021-12-13' AS Date), 49024.5000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (10, CAST(N'2021-12-13' AS Date), 10505.2500)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (11, CAST(N'2021-12-13' AS Date), 6060.0000)
INSERT [dbo].[vendas] ([id_venda], [data_venda], [valor_venda]) VALUES (12, CAST(N'2021-12-13' AS Date), -3501.7500)
SET IDENTITY_INSERT [dbo].[vendas] OFF
GO
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (2, 2)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (3, 5)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (4, 1)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (5, 2)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (6, 2)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (8, 1)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (9, 1)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (10, 1)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (11, 2)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (12, 1)
INSERT [dbo].[vendaXproduto] ([id_venda], [id_produto]) VALUES (7, 1)
GO
ALTER TABLE [dbo].[vendas] ADD  CONSTRAINT [DF_vendas_data_venda]  DEFAULT (getdate()) FOR [data_venda]
GO
ALTER TABLE [dbo].[produtos]  WITH CHECK ADD  CONSTRAINT [id_tipo_produtoFK] FOREIGN KEY([id_tipo_produto])
REFERENCES [dbo].[tipos_produtos] ([id_tipo_produto])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[produtos] CHECK CONSTRAINT [id_tipo_produtoFK]
GO
ALTER TABLE [dbo].[tipos_produtos]  WITH CHECK ADD  CONSTRAINT [id_tipo_impostoFK] FOREIGN KEY([id_imposto])
REFERENCES [dbo].[valores_percentuais] ([id_imposto])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[tipos_produtos] CHECK CONSTRAINT [id_tipo_impostoFK]
GO
ALTER TABLE [dbo].[vendaXproduto]  WITH CHECK ADD  CONSTRAINT [FK_id_produto] FOREIGN KEY([id_produto])
REFERENCES [dbo].[produtos] ([id_produto])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[vendaXproduto] CHECK CONSTRAINT [FK_id_produto]
GO
ALTER TABLE [dbo].[vendaXproduto]  WITH CHECK ADD  CONSTRAINT [FK_id_venda] FOREIGN KEY([id_venda])
REFERENCES [dbo].[vendas] ([id_venda])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[vendaXproduto] CHECK CONSTRAINT [FK_id_venda]
GO
